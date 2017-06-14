@extends('layouts.app')

@section('template_title')
  Showing User {{ $user->name }}
@endsection

@php
  $levelAmount = 'Level:';

  if ($user->level() >= 2) {
      $levelAmount = 'Levels:';

  }
@endphp

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="panel @if ($user->activated == 1) panel-success @else panel-danger @endif">

          <div class="panel-heading">
            <a href="/users/" class="btn btn-primary btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              <span class="hidden-xs">{{ trans('usersmanagement.usersBackBtn') }}</span>
            </a>
            {{ trans('usersmanagement.usersPanelTitle') }}
          </div>
          <div class="panel-body">

            <div class="well">
              <div class="row">
                <div class="col-sm-6">
                </div>

                <div class="col-sm-6">

                  <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                    {{ $user->name }}
                  </h4>
                  <p class="text-center text-left-tablet">
                    <strong>
                      {{ $user->first_name }} {{ $user->last_name }}
                    </strong>
                    <br />
                    {{ HTML::mailto($user->email, $user->email) }}
                  </p>

                  @if ($user->profile)
                    <div class="text-center text-left-tablet margin-bottom-1">

                      <a href="{{ url('/profile/'.$user->name) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.viewProfile') }}</span>
                      </a>

                      <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('usersmanagement.editUser') }} </span>
                      </a>

                      {!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'form-inline')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('usersmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user?')) !!}
                      {!! Form::close() !!}

                    </div>
                  @endif

                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>
              <div class="row">
                  {{--<img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar">--}}
                  <div class="col-md-4">
                      <h6>Personal Information</h6>
                      <dl class="user-info">
                          <dt>
                              {{ trans('profile.showProfileUsername') }}
                          </dt>
                          <dd>
                              {{ $user->name }}
                          </dd>

                          <dt>
                              {{ trans('profile.showProfileFirstName') }}
                          </dt>
                          <dd>
                              {{ $user->first_name }}
                          </dd>

                          @if ($user->last_name)
                              <dt>
                                  {{ trans('profile.showProfileLastName') }}
                              </dt>
                              <dd>
                                  {{ $user->last_name }}
                              </dd>
                          @endif
                          @if ($user->sa_id)
                              <dt>
                                  {{ trans('profile.showProfileSAID') }}
                              </dt>

                              <dd>
                                  {{ $user->sa_id }}
                              </dd>
                          @endif
                          @if ($user->passport_number)
                              <dt>
                                  {{ trans('profile.showProfilePassportNo') }}
                              </dt>
                              <dd>
                                  {{ $user->passport_number }}
                              </dd>
                          @endif

                          @if ($user->sex !== NULL)
                              <dt>
                                  {{ trans('profile.showProfileSex') }}
                              </dt>
                              <dd>

                                  @if ($user->sex === '0')
                                      Male
                                  @elseif($user->sex === '1')
                                      Female
                                  @elseif($user->sex === '2')
                                      Other
                                  @endif

                              </dd>
                          @endif

                          @if ($user->profile)


                              @if ($user->profile->location)
                                  <dt>
                                      {{ trans('profile.showProfileLocation') }}
                                  </dt>
                                  <dd>
                                      {{ $user->profile->location }} <br />
                                      Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span> <br />

                                      <div id="map-canvas"></div>

                                  </dd>
                              @endif


                          @endif

                      </dl>
                  </div>
                  <div class="col-md-4">
                      <h6>Contact Information</h6>
                      <dl class="user-info">
                          <dt>
                              {{ trans('profile.showProfileEmail') }}
                          </dt>

                          <dd>
                              {{ $user->email }}
                          </dd>

                          @if ($user->primary_cell)
                              <dt>
                                  {{ trans('profile.showProfilePrimaryCell') }}
                              </dt>
                              <dd>
                                  {{ $user->primary_cell }}
                              </dd>
                          @endif
                          @if ($user->secondary_cell)
                              <dt>
                                  {{ trans('profile.showProfileSecondaryCell') }}
                              </dt>
                              <dd>
                                  {{ $user->secondary_cell }}
                              </dd>
                          @endif
                      </dl>

                      <h6>Social Profiles</h6>
                      <dl class="user-info">
                          @if ($user->profile->twitter_username)
                              <dt>
                                  {{ trans('profile.showProfileTwitterUsername') }}
                              </dt>
                              <dd>
                                  {!! HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')) !!}
                              </dd>
                          @endif

                          @if ($user->profile->facebook_username)
                              <dt>
                                  {{ trans('profile.showProfileFacebookUsername') }}
                              </dt>
                              <dd>
                                  {!! HTML::link('https://facebook.com/'.$user->profile->facebook_username, $user->profile->facebook_username, array('class' => 'facebook-link', 'target' => '_blank')) !!}
                              </dd>
                          @endif


                      </dl>
                  </div>

                  <div class="col-md-4">
                      <h6>Membership Information</h6>
                      <dl class="user-info">
                          @if ($user->profile->sapc_number)
                              <dt>
                                  {{ trans('profile.showProfileSAPCNumber') }}
                              </dt>
                              <dd>
                                  {{$user->profile->sapc_number}}
                              </dd>
                              <dt>
                                  {{ trans('profile.showProfileSAPCActive') }}
                              </dt>
                              <dd>
                                  @if ($user->profile->sapc_active)
                                      YES
                                  @else
                                      NO
                              </dd>
                          @endif
                          @if ($user->profile->sapc_registration)
                              <dt>
                                  {{ trans('profile.showProfileSAPCRegDate') }}
                              </dt>
                              <dd>
                                  {{$user->profile->sapc_registration}}
                              </dd>
                          @endif
                          @endif
                          @if ($user->profile->pssa_number)
                              <dt>
                                  {{ trans('profile.showProfilePSSANumber') }}
                              </dt>
                              <dd>
                                  {{$user->profile->pssa_number}}
                              </dd>
                              <dt>
                                  {{ trans('profile.showProfilePSSAActive') }}
                              </dt>
                              <dd>
                                  @if ($user->profile->pssa_active)
                                      YES
                                  @else
                                      NO
                              </dd>
                          @endif
                          @if ($user->profile->sapc_registration)
                              <dt>
                                  {{ trans('profile.showProfileSAPCRegDate') }}
                              </dt>
                              <dd>
                                  {{$user->profile->sapc_registration}}
                              </dd>
                          @endif
                          @endif

                      </dl>
                      <h6>Internship Information</h6>
                      <dl class="user-info">

                      </dl>
                  </div>
              </div>
              @if ($user->profile->bio)
                  <div class="row">
                      <div class="col-md-12">
                          <h6>
                              {{ trans('profile.showProfileBio') }}
                          </h6>
                          <dd>
                              {{ $user->profile->bio }}
                          </dd>
                      </div>
                  </div>
              @endif
              <hr>
              <div class="row">
                  <div class="col-md-12">
                      <h6>Educational Information</h6>
                      <table class="table table-condensed">
                          <th>Qualification Name</th><th>University</th>
                          <th>First Enrolled</th><th>Graduated</th>

                          @forelse($education as $value)
                              <tr>
                                  <td>{{$value->qualification_name}}</td>
                                  <td>{{$value->university_name}}</td>
                                  <td>{{$value->first_enrolled}}</td>
                                  <td>{{$value->graduated}}</td>
                              </tr>

                          @empty

                          @endforelse

                      </table>
                      <dl class="user-info">
                          {{--@foreach()--}}
                          {{--<div class="row">--}}
                          {{--<div class="col-md-12">--}}
                          {{--<h6>--}}
                          {{--{{ trans('profile.showProfileBio') }}--}}
                          {{--</h6>--}}
                          {{--<dd>--}}
                          {{--{{ $qualifications->qualification_name }}--}}
                          {{--</dd>--}}
                          {{--</div>--}}
                          {{--</div>--}}
                          {{--@endforeach--}}
                      </dl>
                  </div>
              </div>
              @if ($user->profile)
                  @if (Auth::user()->id == $user->id)

                      {!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}

                  @endif
              @else

                  <p>{{ trans('profile.noProfileYet') }}</p>
                  {!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}

              @endif

          </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')

@endsection

@section('footer_scripts')

  @include('scripts.delete-modal-script')

@endsection
