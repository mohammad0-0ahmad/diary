<template>
    <nav class="nav-bar">
        <div>
            <a class="navbar-brand" :href="routes['home']">
                <img src="/images/diary-logo-light.png" height="45" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ $t('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="nav-bar-collapse" id="navbarSupportedContent">
                <ul>
                    <fragments v-if="isAuthed">
                        <li class="dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ user.name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" :href="routes['logout']" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ $t('Logout') }}
                                </a>
                                <form id="logout-form" :action="routes['logout']" method="POST" class="d-none">
                                    <csrf></csrf>
                                </form>
                            </div>
                        </li>
                    </fragments>
                    <fragments v-else>
                        <li>
                            <a :href="routes['login']">{{ $t('auth.login') }}</a>
                        </li>
                        <li>
                            <a :href="routes['register']">{{ $t('auth.register') }}</a>
                        </li>
                    </fragments>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import "./nav-bar.scss";

export default {
    inject: ["isAuthed", "user", "routes"],
}
</script>