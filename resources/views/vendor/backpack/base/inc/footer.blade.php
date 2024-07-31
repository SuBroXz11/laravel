@if (config('backpack.base.show_powered_by') || config('backpack.base.developer_link'))
    <div class="text-muted ml-auto mr-auto">
        &copy; {{ date('Y') }}
    </div>
@endif
