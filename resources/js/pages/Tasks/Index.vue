<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import tasks from '@/routes/tasks';
import type { Task } from '@/types';

interface Props {
    taskList: Task[];
}

defineProps<Props>();
</script>

<template>
    <Head title="Index" />
    <div class="mx-4">
        <div class="mt-4 flex justify-end">
            <Button>
                <Link :href="tasks.create()">Create Task</Link>
            </Button>
        </div>
        <Table class="mt-4">
            <TableHeader>
                <TableRow>
                    <TableHead>Task</TableHead>
                    <TableHead class="w-[100px]">Status</TableHead>
                    <TableHead class="w-[100px] text-right">Actions</TableHead>
                </TableRow>
            </TableHeader>
            <TableBody>
                <TableRow v-for="task in taskList" :key="task.id">
                    <TableCell>{{ task.name }}</TableCell>
                    <TableCell
                        :class="{
                            'text-green-600': task.is_completed,
                            'text-red-700': !task.is_completed,
                        }"
                        >{{
                            task.is_completed ? 'Complete' : 'In Progress'
                        }}</TableCell
                    >
                    <TableCell class="text-right"
                        >Button to edit/delete</TableCell
                    >
                </TableRow>
            </TableBody>
        </Table>
    </div>
</template>
