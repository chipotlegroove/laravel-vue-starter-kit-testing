<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { onMounted, watch } from 'vue';
import { toast } from 'vue-sonner';
import { Badge } from '@/components/ui/badge';
import type { Task } from '@/types';
import { BadgeCheckIcon, BadgeX, BadgeXIcon } from '@lucide/vue';

interface Props {
    task: Task;
}

const props = defineProps<Props>();
const page = usePage();
watch(
    () => page.flash,
    (flash) => {
        if (flash.message) {
            toast(flash.message);
        }
    },
    { immediate: true },
);

onMounted(() => {
    console.log(props.task);
});
</script>

<template>
    <Head title="Show" />
    <div class="mx-4 mt-2">
        <h1 class="text-xl">{{ task.name }}</h1>
        <div class="flex items-center space-x-2">
            <p>Task complete?</p>
            <p v-if="task.completed"><BadgeCheckIcon /></p>
            <p v-else><BadgeXIcon /></p>
        </div>
    </div>
</template>
