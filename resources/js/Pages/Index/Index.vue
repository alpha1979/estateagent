<template>
    <MainLayout>
        <div>
            The message is {{ message }}
        </div>
    </MainLayout>
    
</template>

<script setup>
    defineProps(['message'])
</script>
