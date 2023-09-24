<script setup >
import { onMounted, ref, defineEmits } from 'vue';

defineProps({
    modelValue: {
        type: String,
        require: true
    },
})
// emit event to update componentValue
defineEmits(['change:modelValue', 'change:show']);
// create a pointer between input element and its value
const element = ref(null);


onMounted(() => {
    if (element.value.hasAttribute('autofocus')) {
        element.value.focus()
    }
})

// allow to be accessed using child Components/ import as component
defineExpose({
    focus: () => {
        element.value.focus()
    }
})

</script>

<template>
    <div class="relative">
        <input :value="modelValue" @change="$emit('change:modelValue', $event.target.val)" ref="element">
        <!-- <button @click="togglePasswordVisibility">
            <i v-show="!show" class="fa-solid fa-eye"></i>
            <i v-show="show" class="fa-solid fa-eye-slash"></i>
        </button> -->
    </div>
</template>

<style scoped></style>
