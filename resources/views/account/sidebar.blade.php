<div class="col-lg-3 col-md-4">
    <div class="myaccount-tab-menu nav" role="tablist">

        <a  href="{{ URL('account') }}"  class="{{Request::segments()[0] == 'account' ? 'active' : ''}}"  ><i class="fas fa-th"></i>
            Dashboard </a>
        <a href="{{ URL('orders') }}" class="{{Request::segments()[0] == 'orders' ? 'active' : ''}}" ><i class="fa fa-cart-arrow-down"></i> Orders History</a>

        <a href="{{ URL('account-detail') }}" class="{{Request::segments()[0] == 'account-detail' ? 'active' : ''}}" ><i class="fa fa-user"></i> Account Details</a>

        <a href="{{ URL('signout') }}"  ><i class="fas fa-arrow-circle-left"></i> Logout</a>
    </div>
</div>
