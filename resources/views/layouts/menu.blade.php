<li class="{{ Request::is('*stores*') ? 'active' : '' }}">
    <a href="{{ route('stores.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.Stores')</span></a>
</li>

<li class="{{ Request::is('*meetTypes*') ? 'active' : '' }}">
    <a href="{{ route('meetTypes.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.Meet Types')</span></a>
</li>

<li class="{{ Request::is('*complaints*') ? 'active' : '' }}">
    <a href="{{ route('complaints.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.Complaints')</span></a>
</li>


<li class="{{ Request::is('*appSettings*') ? 'active' : '' }}">
    <a href="{{ route('appSettings.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.App Settings')</span></a>
</li>

<li class="{{ Request::is('*users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.Users')</span></a>
</li>

{{--<li class="{{ Request::is('*userStores*') ? 'active' : '' }}">--}}
{{--    <a href="{{ route('userStores.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.User Stores')</span></a>--}}
{{--</li>--}}



