<template>
    <form>
        <div class="diary-form">
            <div class="gx-0 justify-content-between">
                <label class="col-md-5">
                    <span>
                        {{$t('components.diary-form.inputs.date.label')}}:
                    </span>
                    <input v-model="formInputs.date" type="date" name="date" class="form-control"
                        placeholder="yyyy-mm-dd" required />
                </label>
                <label class="col-md-5">
                    <span>
                        {{$t('components.diary-form.inputs.privacy.label')}}:
                    </span>
                    <select v-model="formInputs.privacy" class="form-select" name="privacy">
                        <option value="public">{{$t('components.diary-form.inputs.privacy.options.public.label')}}
                        </option>
                        <option value="private">{{$t('components.diary-form.inputs.privacy.options.private.label')}}
                        </option>
                    </select>
                </label>
            </div>
            <label>
                <span>
                    {{$t('components.diary-form.inputs.content.label')}}:
                </span>
                <textarea v-model="formInputs.content" rows="5" name="content"
                    :placeholder="$t('components.diary-form.inputs.content.placeholder')" required></textarea>
            </label>
            <div class="justify-content-center mt-4">
                <div class="col-sm-6">
                    <button class="bg-success" type="submit">
                        {{
                        $t(`components.diary-form.buttons.${ isEditMode ? "save" : "create"}.label`)
                        }}
                    </button>
                    <button type="button" @click="resetInputsToInitialValues"
                        class="bg-danger">{{$t('components.diary-form.buttons.cancel.label')}}</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import "./diary-form.scss";
export default {
    props: {
        data: {
            type: Object,
            default: {
                date: "",
                privacy: "public",
                content: ""
            },
        },
        isEditMode: {
            type: Boolean,
            default: false
        },
        onCancel: {
            type: Function,
        }
    },

    data() {
        return {
            formInputs: { ...this.data },
        }
    },

    methods: {
        resetInputsToInitialValues(e) {
            e?.preventDefault();
            if (this.onCancel) {
                this.onCancel(e);
                return;
            }
            this.formInputs = { ...this.data };
        }
    },

    expose: ["resetInputsToInitialValues", "formInputs"],
}
</script>