<div class="col-12 col-md-12 col-lg-5">
    <div class="card profile-widget">
        <div class="profile-widget-header">
            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name">{{ $user->name }} <div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> {{ strtoupper(Str::headline($user->getRoleNames()->first())) }}
                </div>
            </div>
            @if ($user->opdPivot->isNotEmpty())
                <div>Unit Kerja
                    <div class="text-muted d-inline font-weight-normal">
                        <b>
                            @foreach ($user->opdPivot as $opd)
                                {{ $opd->nama }}
                            @endforeach
                        </b>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
