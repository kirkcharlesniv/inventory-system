<div class="sidebar" data-color="blue">
    <div class="logo">
        <a href="https://facebook.com/callmackoy" class="simple-text logo-mini">
            M. E
        </a>
        <a href="https://facebook.com/callmackoy" class="simple-text logo-normal">
            Inventory System
        </a>
    </div>
    <div class="sidebar-wrapper" style="overflow: hidden;">
        <ul class="nav">
            <li class="{{active_check('home')}}">
                <a href="{{ URL::route('home') }}">
                    <i class="now-ui-icons loader_gear"></i>
                    <p>Inventory</p>
                </a>
            </li>
            <li class="{{active_check('home/items/create')}}">
                <a href="{{ action('ItemsController@create') }}">
                    <i class="now-ui-icons design-2_ruler-pencil"></i>
                    <p>Create New Item</p>
                </a>
            </li>
            <hr>
            <li class="{{active_check('home/employees')}}">
                <a href="{{ action('EmployeesController@index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Employees</p>
                </a>
            </li>
            <li class="{{active_check('home/employees/create')}}">
                <a href="{{ action('EmployeesController@create') }}">
                    <i class="now-ui-icons education_hat"></i>
                    <p>Register A New Employee</p>
                </a>
            </li>
            <hr>
            <li class="{{active_check('home/borrow')}}">
                <a href="{{ action('BorrowsController@index') }}">
                    <i class="now-ui-icons shopping_delivery-fast"></i>
                    <p>Borrowed Item</p>
                </a>
            </li>
            <li class="{{active_check('home/borrow/create')}}">
                <a href="{{ action('BorrowsController@create') }}">
                    <i class="now-ui-icons design-2_ruler-pencil"></i>
                    <p>Borrow New Item</p>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{ URL::to('home/export') }}" target="_blank">
                    <i class="now-ui-icons design-2_ruler-pencil"></i>
                    <p>Export All Data to Excel</p>
                </a>
            </li>
        </ul>
    </div>
</div>