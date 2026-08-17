<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Form } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Field, FieldError, FieldLabel } from '@/components/ui/field';
import { Input } from '@/components/ui/input';
import { store } from '@/routes/tasks';

const form = useForm({
    name: '',
}).withPrecognition(store());
</script>

<template>
    <Head title="Create" />
    <div class="mx-4 mt-2 flex flex-col">
        <Form
            id="form-task-create"
            :action="store()"
            method="post"
            #default="{ errors, invalid, validate }"
        >
            <Field :data-invalid="invalid('name')">
                <FieldLabel> Task Name </FieldLabel>
                <Input
                    id="form-task-create-name"
                    name="name"
                    v-model="form.name"
                    :aria-invalid="invalid('name')"
                    @change="validate('name')"
                />
                <FieldError v-if="invalid('name')" :errors="[errors.name]" />
            </Field>
        </Form>
        <div class="mt-2 flex justify-end">
            <Button
                type="submit"
                form="form-task-create"
                class="cursor-pointer"
            >
                Submit
            </Button>
        </div>
    </div>
</template>
