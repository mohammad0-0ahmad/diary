
<template>
    <slot />
</template>
<script>

export default {
    provide() {
        return {
            routes: {
                "home": "/",
                "register": "/register",
                "login": "/login",
                "logout": "/logout",
                api: {
                    "diaries": "/api/diaries/"
                }
            }
        }
    },
}
</script>