<div class="col-12 col-md-12 col-lg-5">
    <div class="card profile-widget">
        <div class="profile-widget-header">
            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name">{{ auth()->user()->name }} <div
                    class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> {{ auth()->user()->role }}
                </div>
            </div>
            Hai, <b>{{ auth()->user()->name }}</b> dengan
            Username <b>{{ auth()->user()->username }}</b>
            @if (auth()->user()->email)
                dan email <b>{{ auth()->user()->email }}</b>
            @endif
            merupakan
            role
            <b>{{ auth()->user()->role }}</b>
            dari Perangkat Daerah <b>AAAAA</b>.
        </div>
    </div>
</div>
