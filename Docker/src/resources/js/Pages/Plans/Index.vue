<script setup>
defineProps({
    plans: Array,
});
</script>

<template>
    <div>
        <h1>Plans</h1>
        <div v-for="plan in plans" :key="plan.id">
            <h2>{{ plan.title }}</h2>
            <p>{{ plan.description }}</p>
        </div>
    </div>
</template>
