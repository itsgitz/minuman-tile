<div class="py-1"></div>
<div class="message">
    {{-- ORDER MESSAGE --}}
    @if (session('order_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('order_message') }}
        <a href="{{ route('client_orders_get') }}">lihat transaksi</a>
        <button
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ORDER MESSAGE --}}

    {{-- REGISTERED USER MESSAGE --}}
    @if (session('registered_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('registered_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- REGISTERED USER MESSAGE --}}

    {{-- ADD CART MESSAGE --}}
    @if (session('cart_add_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('cart_add_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADD CART MESSAGE --}}

    {{-- DELETED CART MESSAGE --}}
    @if (session('cart_delete_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('cart_delete_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETED CART MESSAGE --}}

    {{-- UPDATED CART MESSAGE --}}
    @if (session('cart_update_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('cart_update_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- UPDATED CART MESSAGE --}}


    {{-- ADMIN PROCESS ORDER --}}
    @if (session('admin_orders_process_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_orders_process_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN PROCESS ORDER --}}

    {{-- ADMIN UPDATE CLIENT --}}
    @if (session('admin_update_client_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_update_client_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN UPDATE CLIENT --}}

    {{-- ADMIN DELETE CLIENT --}}
    @if (session('admin_delete_client_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_delete_client_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN DELETE CLIENT --}}

    {{-- ADMIN ADD ADMIN --}}
    @if (session('admin_add_admin_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_add_admin_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN ADD ADMIN --}}

    {{-- ADMIN UPDATE ADMIN --}}
    @if (session('admin_update_admin_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_update_admin_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN UPDATE ADMIN --}}

    {{-- ADMIN DELETE ADMIN --}}
    @if (session('admin_delete_admin_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_delete_admin_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN DELETE ADMIN --}}

    {{-- ADMIN ERROR ADD MENU --}}
    @if (session('admin_error_add_menu_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('admin_error_add_menu_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN ERROR ADD MENU --}}

    {{-- ADD MENU MESSAGE --}}
    @if (session('admin_add_menu_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_add_menu_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADD MENU MESSAGE --}}

    {{-- EDIT MENU MESSAGE --}}
    @if (session('admin_edit_menu_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_edit_menu_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- EDIT MENU MESSAGE --}}

    {{-- ADD STOCK MESSAGE --}}
    @if (session('admin_add_stock_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_add_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADD STOCK MESSAGE --}}


    {{-- ADD MENU STOCK MESSAGE --}}
    @if (session('admin_add_menu_stock_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_add_menu_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADD MENU STOCK MESSAGE --}}

    {{-- EDIT MENU STOCK MESSAGE --}}
    @if (session('admin_edit_menu_stock_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_edit_menu_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- EDIT MENU STOCK MESSAGE --}}

    {{-- DELETE MENU STOCK MESSAGE --}}
    @if (session('admin_delete_menu_stock_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_delete_menu_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE MENU STOCK MESSAGE --}}


    {{-- ADD STOCK UNIT MESSAGE --}}
    @if (session('add_stock_unit_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('add_stock_unit_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADD STOCK UNIT MESSAGE --}}

    {{-- EDIT STOCK MESSAGE --}}
    @if (session('admin_edit_stock_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_edit_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- EDIT STOCK MESSAGE --}}

    {{-- DELETE STOCK MESSAGE --}}
    @if (session('admin_delete_stock_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_delete_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE STOCK MESSAGE --}}

    {{-- DELETE ERROR STOCK MESSAGE --}}
    @if (session('admin_error_delete_stock_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('admin_error_delete_stock_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE ERROR STOCK MESSAGE --}}

    {{-- ADMIN LOGIN MESSAGE --}}
    @if (session('admin_login_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_login_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ADMIN LOGIN MESSAGE --}}

    {{-- DELETE STOCK UNIT MESSAGE --}}
    @if (session('admin_delete_stock_unit_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_delete_stock_unit_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE STOCK UNIT MESSAGE --}}

    {{-- DELETE ERROR STOCK UNIT MESSAGE --}}
    @if (session('admin_delete_error_stock_unit_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('admin_delete_error_stock_unit_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE ERROR STOCK MESSAGE --}}

    @error ('edit_stock_unit_name')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @enderror


    {{-- UPDATE STOCK UNIT MESSAGE --}}
    @if (session('admin_edit_stock_unit_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_edit_stock_unit_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- UPDATE STOCK UNIT MESSAGE --}}


    {{-- DELETE ERROR MENU MESSAGE --}}
    @if (session('admin_error_delete_menu_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('admin_error_delete_menu_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE ERROR MENU MESSAGE --}}


    {{-- DELETE MENU MESSAGE --}}
    @if (session('admin_delete_menu_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_delete_menu_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- DELETE MENU MESSAGE --}}

    {{-- ORDER EXPORT BY DATE ERROR MESSAGE --}}
    @if (session('admin_order_export_by_date_error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('admin_order_export_by_date_error') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- ORDER EXPORT BY DATE ERROR MESSAGE --}}


    {{-- REQUEST STOCKS MESSAGE --}}
    @if (session('admin_stocks_request_add_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_stocks_request_add_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- REQUEST STOCKS MESSAGE --}}


    {{-- REQUEST STOCKS ERROR MESSAGE --}}
    @if (session('admin_stocks_request_error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('admin_stocks_request_error_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- REQUEST STOCKS ERROR MESSAGE --}}

    {{-- REQUEST STOCKS ACCEPT MESSAGE --}}
    @if (session('admin_stocks_request_accept_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin_stocks_request_accept_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- REQUEST STOCKS ACCEPT MESSAGE --}}

    {{-- CLIENT SETTING MESSAGE --}}
    @if (session('client_setting_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('client_setting_message') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        >
        </button>
    </div>
    @endif
    {{-- CLIENT SETTING MESSAGE --}}
</div>
<div class="py-1"></div>
