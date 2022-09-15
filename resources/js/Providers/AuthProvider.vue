
<template>
    <slot />
</template>
<script>

export default {
    inject: ["routes"],
    props: {
        csrf: {
            type: String,
        },
        user: {
            type: Object
        },
    },
    methods: {
        async fetchDiariesApi({ suffix = "", method = "Post", body = undefined, headers = {}, ...init }) {
            let response;
            try {
                response = await fetch(this.routes.api.diaries + suffix, {
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": this.csrf,
                        ...headers
                    },
                    method,
                    ...(!body ? {} : { body: JSON.stringify(body) }),
                    ...init
                });

                return { status: response.status, data: await response.json() }

            } catch (error) {
                return { status: response?.status, response: response, error: error }
            }
        }
    },
    provide() {
        return {
            csrf: this.csrf,
            user: this.user,
            fetchDiariesApi: this.fetchDiariesApi,
            isAuthed: Boolean(this.user)
        }
    }
}
</script>