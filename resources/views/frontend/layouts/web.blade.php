<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))">

    <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">

    <link rel="stylesheet" href="{{ asset('asset/icons/cartzilla-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/theme.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script>
        window.APP_CONFIG = {
            csrfToken: document.querySelector('meta[name="csrf-token"]').content,
            ajaxSearchUrl: "{{ route('search.ajax') }}"
        };
    </script>

</head>

<body>

@include('frontend.components.offcanvas')
@include('frontend.components.header')

<main class="content-wrapper">
    @yield('content')
</main>

@include('frontend.components.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/theme.min.js') }}"></script>

<script>
toastr.options = {
    closeButton: true,
    progressBar: true,
    newestOnTop: true,
    positionClass: "toast-top-right",
    timeOut: 4000,
    extendedTimeOut: 1000
};

function notify(message, type = 'info') {
    if (!message) return;
    if (type === 'success') toastr.success(message);
    else if (type === 'warning') toastr.warning(message);
    else if (type === 'danger' || type === 'error') toastr.error(message);
    else toastr.info(message);
}
</script>

<script>
@foreach (session('flash_notification', collect())->toArray() as $message)
notify(@json($message['message']), @json($message['level']));
@endforeach
</script>


<script>
    function addToWishList(id) {
    @if (Auth::check() && Auth::user()->user_type == 'customer')
        $.post('{{ route('wishlists.store') }}', {
            _token: '{{ csrf_token() }}',
            id: id
        })
        .done(function(data) {
            if (data != 0) {
                $('#wishlist').html(data);
                notify("{{ translate('Item has been added to wishlist') }}", 'success');
            } else {
                notify("{{ translate('Please login first') }}", 'warning');
            }
        })
        .fail(function() {
            notify("{{ translate('Something went wrong') }}", 'error');
        });
    @elseif(Auth::check() && Auth::user()->user_type != 'customer')
        notify("{{ translate('Please Login as a customer to add products to the WishList.') }}", 'warning');
    @else
        notify("{{ translate('Please login first') }}", 'warning');
    @endif
}

function addToCompare(id) {
    $.post('{{ route('compare.addToCompare') }}', {
        _token: '{{ csrf_token() }}',
        id: id
    })
    .done(function (response) {
        notify('Item has been added to compare list', 'success');

        if (response.count !== undefined) {
            $('#compare_items_sidenav').text(response.count);
        }
    })
    .fail(function () {
        notify('Failed to add item to compare', 'danger');
    });
}

function getSelectedQuantity() {
    const input = document.querySelector('.count-input input[type="number"]');
    let qty = parseInt(input?.value, 10);
    return qty > 0 ? qty : 1;
}


function checkAddToCartValidity() {
    const radios = document.querySelectorAll('#option-choice-form input[type="radio"]');
    const names = new Set([...radios].map(r => r.name));
    const checked = document.querySelectorAll('#option-choice-form input[type="radio"]:checked').length;
    return checked === names.size;
}

function addToCart(productId) {
    /* ---------------- AUTH CHECK ---------------- */
    @if (Auth::check() && Auth::user()->user_type !== 'customer')
        notify("{{ translate('Please login as a customer to add products to the cart.') }}", 'warning');
        return;
    @endif

    /* ---------------- GET FORM FOR THIS PRODUCT ---------------- */
    const form = document.getElementById(`add-to-cart-form-${productId}`);
    if (!form) {
        notify("{{ translate('Product form not found.') }}", 'error');
        return;
    }

    const formData = new FormData(form);

    /* ---------------- SHOW MODAL ---------------- */
    const modalEl = document.getElementById('addToCart');
    if (modalEl && window.bootstrap?.Modal) {
        try {
            bootstrap.Modal.getOrCreateInstance(modalEl, { backdrop: true }).show();
        } catch (e) { console.warn(e); }
    }

    /* ---------------- SHOW LOADER ---------------- */
    const loader = document.querySelector('.c-preloader');
    if (loader) loader.style.display = 'block';

    /* ---------------- POST REQUEST ---------------- */
    fetch("{{ route('cart.addToCart') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(async res => {
        const contentType = res.headers.get('content-type') || '';
        if (!res.ok) throw res;
        if (!contentType.includes('application/json')) {
            const text = await res.text();
            console.error('Non-JSON response:', text);
            throw new Error('Invalid server response');
        }
        return res.json();
    })
    .then(data => {
        if (data.error) {
            notify(data.message || "{{ translate('Something went wrong') }}", 'warning');
            return;
        }
        if (data.modal_view) {
            const modalBody = document.getElementById('addToCart-modal-body');
            if (modalBody) modalBody.innerHTML = data.modal_view;
        }
        if (typeof updateNavCart === 'function') {
            updateNavCart(data.nav_cart_view, data.cart_count);
        }
        notify("{{ translate('Product added to cart successfully') }}", 'success');
    })
    .catch(async err => {
        if (err instanceof Response) {
            const text = await err.text();
            console.error('Server error:', text);
            if ([401, 419].includes(err.status)) {
                notify("{{ translate('Session expired. Please login again.') }}", 'warning');
                return;
            }
        }
        notify("{{ translate('Something went wrong. Please try again.') }}", 'error');
    })
    .finally(() => {
        if (loader) loader.style.display = 'none';
    });
}

$('#search').on('keyup focus', function () {
    liveSearch();
});

$(document).on('click', function (e) {
    if (!$(e.target).closest('.container').length) {
        $('.typed-search-box').addClass('d-none');
    }
});

function liveSearch() {
    let searchKey = $('#search').val().trim();

    if (searchKey.length < 2) {
        $('.typed-search-box').addClass('d-none');
        return;
    }

    $('.typed-search-box').removeClass('d-none');
    $('.search-preloader').removeClass('d-none');

    $.post('{{ route('search.ajax') }}', {
        _token: '{{ csrf_token() }}',
        search: searchKey
    }, function (res) {

        $('.search-preloader').addClass('d-none');

        if (res.status === 'empty') {
            $('#search-content').html('');
            $('.search-nothing')
                .removeClass('d-none')
                .html(`Sorry, nothing found for <strong>"${searchKey}"</strong>`);
        } else {
            $('.search-nothing').addClass('d-none');
            $('#search-content').html(res.html);
        }
    });
}



</script>


    
    <!-- Desktop Search -->
    <script>
    (function() {
        const searchInput = document.getElementById('searchInput');
        const searchDropdown = document.getElementById('searchDropdown');
        let debounce = null;
    
        if (!searchInput) return;
    
        searchInput.addEventListener('input', function () {
            const query = this.value.trim();
    
            if (!query) {
                searchDropdown.classList.add('d-none');
                searchDropdown.innerHTML = '';
                return;
            }
    
            clearTimeout(debounce);
            debounce = setTimeout(() => {
                fetch(APP_CONFIG.ajaxSearchUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': APP_CONFIG.csrfToken
                    },
                    body: JSON.stringify({ search: query })
                })
                .then(res => res.json())
                .then(renderDropdown)
                .catch(console.error);
            }, 300);
        });
    
        function renderDropdown(data) {
            let html = '';
    
            if (data.products.length) {
                html += `<div class="fw-bold px-2 pt-2">Products</div>`;
                data.products.forEach(p => {
                    html += `<div class="px-2 py-1 search-item" data-url="${p.url}">${p.name}</div>`;
                });
            }
    
            if (data.shops.length) {
                html += `<div class="fw-bold px-2 pt-2">Stores</div>`;
                data.shops.forEach(s => {
                    html += `<div class="px-2 py-1 search-item" data-url="${s.url}">${s.name}</div>`;
                });
            }
    
            if (data.categories.length) {
                html += `<div class="fw-bold px-2 pt-2">Categories</div>`;
                data.categories.forEach(c => {
                    html += `<div class="px-2 py-1 search-item" data-url="${c.url}">${c.name}</div>`;
                });
            }
    
            if (data.preorder_products.length) {
                html += `<div class="fw-bold px-2 pt-2">Preorder Products</div>`;
                data.preorder_products.forEach(p => {
                    html += `<div class="px-2 py-1 search-item" data-url="${p.url}">${p.name}</div>`;
                });
            }
    
            if (!html) html = `<div class="p-2 text-muted">No results found</div>`;
    
            searchDropdown.innerHTML = html;
            searchDropdown.classList.remove('d-none');
    
            document.querySelectorAll('.search-item').forEach(item => {
                item.addEventListener('click', () => window.location.href = item.dataset.url);
            });
        }
    
        document.addEventListener('click', e => {
            if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
                searchDropdown.classList.add('d-none');
            }
        });
    })();
    </script>
    
    <!-- Mobile Search -->
    <script>
    (function() {
        const mobileInput = document.getElementById('mobileSearchInput');
        const mobileDropdown = document.getElementById('mobileSearchDropdown');
        let mobileTimer = null;
    
        if (!mobileInput) return;
    
        mobileInput.addEventListener('input', function () {
            const query = this.value.trim();
    
            if (!query) {
                mobileDropdown.classList.add('d-none');
                mobileDropdown.innerHTML = '';
                return;
            }
    
            clearTimeout(mobileTimer);
            mobileTimer = setTimeout(() => {
                fetch(APP_CONFIG.ajaxSearchUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': APP_CONFIG.csrfToken
                    },
                    body: JSON.stringify({ search: query })
                })
                .then(res => res.json())
                .then(renderMobileDropdown)
                .catch(console.error);
            }, 300);
        });
    
        function renderMobileDropdown(data) {
            let html = '';
    
            if (data.products.length) {
                html += `<div class="fw-bold px-3 pt-2">Products</div>`;
                data.products.forEach(p => {
                    html += `<div class="px-3 py-2 search-item" data-url="${p.url}">${p.name}</div>`;
                });
            }
    
            if (data.shops.length) {
                html += `<div class="fw-bold px-3 pt-2">Stores</div>`;
                data.shops.forEach(s => {
                    html += `<div class="px-3 py-2 search-item" data-url="${s.url}">${s.name}</div>`;
                });
            }
    
            if (data.categories.length) {
                html += `<div class="fw-bold px-3 pt-2">Categories</div>`;
                data.categories.forEach(c => {
                    html += `<div class="px-3 py-2 search-item" data-url="${c.url}">${c.name}</div>`;
                });
            }
    
            if (data.preorder_products.length) {
                html += `<div class="fw-bold px-3 pt-2">Preorder Products</div>`;
                data.preorder_products.forEach(p => {
                    html += `<div class="px-3 py-2 search-item" data-url="${p.url}">${p.name}</div>`;
                });
            }
    
            if (!html) html = `<div class="p-3 text-muted">No results found</div>`;
    
            mobileDropdown.innerHTML = html;
            mobileDropdown.classList.remove('d-none');
    
            document.querySelectorAll('.search-item').forEach(item => {
                item.onclick = () => window.location.href = item.dataset.url;
            });
        }
    
        document.addEventListener('click', e => {
            if (!mobileInput.contains(e.target) && !mobileDropdown.contains(e.target)) {
                mobileDropdown.classList.add('d-none');
            }
        });
    })();
    </script>

</body>
</html>
