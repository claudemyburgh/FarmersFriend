<div class="wrapper">
    <div class="row">
        <div class="col">
            @if (session('success'))
                <div class="notify notify--success notify__dismissable">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="notify notify--danger notify__dismissable">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
<notify-alert></notify-alert>
