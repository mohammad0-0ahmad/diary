
<template>
    <slot />
</template>
<script>
import { computed } from 'vue';

export default {
    props: {
        data: {
            type: Array,
        }
    },
    data() {
        return {
            diaries: this.data,
        }
    },
    methods: {
        addDiary(diary) {
            this.diaries = [diary, ...this.diaries];
        },

        updateDiary(date, newDiary) {
            this.diaries =
                this.diaries.map(diary =>
                    date === diary.date ? { ...diary, ...newDiary } : diary);
        },

        deleteDiary(date) {
            this.diaries =
                this.diaries.filter(diary =>
                    diary.date !== date);
        }
    },

    provide() {
        return {
            diaries: computed(() => this.diaries),
            addDiary: this.addDiary,
            updateDiary: this.updateDiary,
            deleteDiary: this.deleteDiary,
        }
    },
}
</script>