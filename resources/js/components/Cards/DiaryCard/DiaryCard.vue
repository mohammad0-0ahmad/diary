<template>
    <div class="diary-card">
        <diary-form ref="diaryForm" v-if="isEditMode" :data="data" :isEditMode="true"
            @submit="handleEditSubmition($event, data.date)" :onCancel="toggleEditMode">
        </diary-form>
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
                    <button @click="toggleEditMode" class="bg-warning">
                        {{
                        $t(`components.diary-card.buttons.edit.label`)
                        }}
                    </button>
                    <button @click="handleDelete($event, data.date)"
                        class="bg-danger">{{$t('components.diary-card.buttons.delete.label')}}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "./diary-card.scss";
import {
    StatusCodes,
} from 'http-status-codes';

export default {
    inject: ['fetchDiariesApi', 'deleteDiary', 'updateDiary'],

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
        getFormInputs() {
            return this.$refs.diaryForm.formInputs;
        },

        toggleEditMode(e) {
            this.isEditMode = !this.isEditMode;
        },

        async handleEditSubmition(e, diaryDate) {
            e.preventDefault();
            const newDiaryData = this.getFormInputs();
            const { status } = await this.fetchDiariesApi({ suffix: diaryDate, method: "PATCH", body: newDiaryData });
            if (status === StatusCodes.OK) {
                this.toggleEditMode();
                this.updateDiary(diaryDate, newDiaryData);
                //TODO: Implement toast;
                alert("Diary has been updated successfully.");
            } else {
                //TODO: Implement toast;
                alert("Couldn't update a diary.");
            }
        },

        async handleDelete(e, diaryDate) {
            e.preventDefault();
            const { status } = await this.fetchDiariesApi({ suffix: diaryDate, method: "DELETE" });
            if (status === StatusCodes.OK) {
                this.deleteDiary(diaryDate);
                //TODO: Implement toast;
                alert("Diary has been deleted successfully.");
            } else {
                //TODO: Implement toast;
                alert("Couldn't delete a diary.");
            }
        }
    }
}
</script>