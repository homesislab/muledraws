<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
            <span class="kt-header__topbar-username kt-hidden-mobile">{userName}</span>
            <img class="kt-hidden" alt="Pic" src="{assetsPath}media/users/300_25.jpg" />
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{userInitial}</span>
        </div>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)">
            <div class="kt-user-card__avatar">
                <img class="kt-hidden" alt="Pic" src="{assetsPath}media/users/300_25.jpg" />
                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{userInitial}</span>
            </div>
            <div class="kt-user-card__name">{userName}</div>
        </div>

        <!--begin: Navigation -->
        <div class="kt-notification">
            <a href="{base_url}profile" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Profile
                    </div>
                    <div class="kt-notification__item-time">
                        Account settings and more
                    </div>
                </div>
            </a>

            <div class="kt-notification__custom kt-space-between">
                <a href="{base_url}logout"
                    class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
            </div>
        </div>
    </div>
</div>
