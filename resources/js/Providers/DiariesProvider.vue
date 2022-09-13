
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
        handleDiaryDeleteion(date) {
            this.diaries =
                this.diaries.filter(diary =>
                    diary.date !== date);
        },
        handleDiaryUpdate(newDiary) {
            this.diaries =
                this.diaries.map(diary =>
                    diary.date === date ? { ...diary, ...newDiary } : diary);
        }
    },
    provide() {
        return {
            diaries: computed(() => this.diaries),
            handleDiaryDeleteion: this.handleDiaryDeleteion,
            handleDiaryUpdate: this.handleDiaryUpdate
        }
    },
}
</script>