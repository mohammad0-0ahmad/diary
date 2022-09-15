<template>
    <div class="diary-generator">
        <p class="title">{{$t('components.diary-generator.title')}}:</p>
        <diary-form ref="diaryForm" @submit="handleCreateDiary"></diary-form>
    </div>
</template>

<script>
import "./diary-generator.scss";
import {
    StatusCodes,
} from 'http-status-codes';

export default {
    inject: ["routes", "addDiary", "fetchDiariesApi"],

    methods: {
        getFormInputs() { return this.$refs.diaryForm.formInputs; },

        resetFormInputs(...args) { return this.$refs.diaryForm.resetInputsToInitialValues(...args) },

        async handleCreateDiary(e) {
            e.preventDefault();
            const formInputsData = this.getFormInputs();
            const { status } = await this.fetchDiariesApi({ body: formInputsData });
            if (status === StatusCodes.CREATED) {
                this.resetFormInputs();
                this.addDiary(formInputsData);
                //TODO: Implement toast;
                alert("New diary has been created successfully.");
            } else {
                //TODO: Implement toast;
                alert("Couldn't create a diary.");
            }
        }
    }
}

</script>