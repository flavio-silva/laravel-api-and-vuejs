<template>
    <div class="relative pb-4">
        <label :for="name" class="absolute text-xs font-bold pt-2 text-blue-500 uppercase">{{ label }}</label>
        <input type="text"
               :id="name"
               class="pt-8 w-full border-b pb-2 focus:outline-none focus:border-blue-400 text-gray-900"
               :placeholder="placeholder"
               @input="updateField"
               :value="value"
               :class="errorClassObject()"
       />

        <p class="text-red-600 text-sm" v-if="showMessage" v-text="errorMessage">Error</p>

    </div>
</template>

<script>

export default {
    name: 'InputField',
    props: [
        'name',
        'label',
        'placeholder',
        'errorMessage',
        'value'
    ],
    data() {
        return {
            showMessage: false,
        }
    },
    watch: {
      errorMessage(newValue, oldValue) {
          this.showMessage = true;
      }
    },
    methods: {
        updateField(event) {
            this.$emit('input', event.target.value);
            this.showMessage = false;
        },
        errorClassObject() {
            return {
                'error-field': this.showMessage,
            }
        }
    },
}
</script>
<style scoped>
    .error-field {
        @apply .border-red-500 .border-b-2
    }
</style>
