<template>
    <div class="diary-card">
        <diary-form v-if="isEditMode" :data="data" :isEditMode="true" :onCancel="toggleEditMode"></diary-form>
        <div v-else class="preview">
            <div class="row justify-content-between">
                <div class="col-sm-5">
                    <span> {{
                    $t(`components.diary-card.labels.date`)
                    }}</span>
                    <p>{{data?.date}}</p>
                </div>
                <div class="col-sm-5">
                    <span> {{
                    $t(`components.diary-card.labels.privacy`)
                    }}</span>
                    <p>{{data?.privacy}}</p>
                </div>
            </div>
            <div class="row">
                <span> {{
                $t(`components.diary-card.labels.content`)
                }}</span>
                <p>{{data?.content}}</p>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-sm-6">
                    <button @:click="toggleEditMode" class="bg-warning">
                        {{
                        $t(`components.diary-card.buttons.edit.label`)
                        }}
                    </button>
                    <button class="bg-danger">{{$t('components.diary-card.buttons.delete.label')}}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Object
        },
    },
    data() {
        return {
            isEditMode: false,
        }
    },
    methods: {
        toggleEditMode() {
            this.isEditMode = !this.isEditMode;
        }
    },
}
</script>