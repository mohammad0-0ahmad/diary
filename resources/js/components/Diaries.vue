<template>
    <div v-for="diary in diaries.value" :key="diary?.date">
        <diary-card :data="diary"></diary-card>
    </div>
</template>

<script>
export default {
    inject: ['diaries']
}
</script>
