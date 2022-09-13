<template>
    <div class="diary-form ">
        <div class="gx-0 justify-content-between">
            <label class="col-md-5">
                <span>
                    {{$t('components.diary-form.inputs.date.label')}}:
                </span>
                <input type="date" name="date" class="form-control" placeholder="yyyy-mm-dd" required />
            </label>
            <label class="col-md-5">
                <span>
                    {{$t('components.diary-form.inputs.privacy.label')}}:
                </span>
                <select class="form-select" name="privacy">
                    <option>{{$t('components.diary-form.inputs.privacy.options.public.label')}}</option>
                    <option value="[]">{{$t('components.diary-form.inputs.privacy.options.private.label')}}</option>
                </select>
            </label>
        </div>
        <label>
            <span>
                {{$t('components.diary-form.inputs.content.label')}}:
            </span>
            <textarea cla rows="5" name="content" :placeholder="$t('components.diary-form.inputs.content.placeholder')"
                required></textarea>
        </label>
        <div class="justify-content-center mt-4">
            <div class="col-sm-6">
                <button class="bg-success" type="submit">
                    {{
                    $t(`components.diary-form.buttons.${ isEditMode ? "save" : "create"}.label`)
                    }}
                </button>
                <button class="bg-danger">{{$t('components.diary-form.buttons.cancel.label')}}</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        isEditMode: {
            type: Boolean,
            default: false
        }
    }
}
</script>