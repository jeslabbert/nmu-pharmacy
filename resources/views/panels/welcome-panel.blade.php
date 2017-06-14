@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp


<div class="panel panel-primary @role('admin', true) panel-info  @endrole">
    <div class="panel-heading">

        Welcome {{ Auth::user()->name }}

        @role('admin', true)
            <span class="pull-right label label-primary" style="margin-top:4px">
            Admin Access
            </span>
        @else
            <span class="pull-right label label-warning" style="margin-top:4px">
            User Access
            </span>
        @endrole

    </div>
    <div class="panel-body">

        <div class="content" style="width: 100%;">
            <img src="{{URL::asset('/images/logo.png')}}">
        </div>
        <h6 class="text-center">
            {{ trans('auth.loggedIn') }}
        </h6>
        <hr>
<div class="row">

<div class="col-md-3 col-md-offset-3 text-center">
    <a><button class="viewProfile"><i class="fa fa-profile fa-user" aria-hidden="true"></i><br>View Profile</button></a>
</div>
    <div class="col-md-3 text-center">
    <a><button class="editProfile"><i class="fa fa-profile fa-user-md" aria-hidden="true"></i><br>Edit Profile</button></a>
</div>

</div>
        <hr>
        <p>
            You have
                @role('admin')
                   Admin
                @endrole
                @role('user')
                   User
                @endrole
            Access
        </p>

        <h6>
        @role('admin')

            <hr>

            <h4>
                You have permissions:
                @permission('view.users')
                    <span class="label label-primary margin-half margin-left-0"">
                        {{ trans('permsandroles.permissionView') }}
                    </span>
                @endpermission

                @permission('create.users')
                    <span class="label label-info margin-half margin-left-0"">
                        {{ trans('permsandroles.permissionCreate') }}
                    </span>
                @endpermission

                @permission('edit.users')
                    <span class="label label-warning margin-half margin-left-0"">
                        {{ trans('permsandroles.permissionEdit') }}
                    </span>
                @endpermission

                @permission('delete.users')
                    <span class="label label-danger margin-half margin-left-0"">
                        {{ trans('permsandroles.permissionDelete') }}
                    </span>
                @endpermission

            </h4>

        @endrole

    </div>
</div>