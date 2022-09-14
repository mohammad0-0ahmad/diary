
<template>
    <slot />
</template>
<script>

export default {
    props: {
        csrf: {
            type: String,
        },
        user: {
            type: Object
        },
    },
    provide() {
        return {
            csrf: this.csrf,
            user: this.user,
            isAuthed: Boolean(this.user)
        }
    },
    mounted() {
        console.log(this.user);
        console.log(this.csrf);
    }
}
</script>