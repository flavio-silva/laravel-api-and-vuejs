<template>
    <div>
        <form @submit.prevent="saveContact">
            <input-field name="name" label="Contact Name" :errorMessage="errors.name[0]" placeholder="Contact Name" v-model="form.name"/>

            <input-field name="email" label="Contact Email" :errorMessage="errors.email[0]" placeholder="Contact Email" v-model="form.email"/>

            <input-field name="company" label="Company" :errorMessage="errors.company[0]" placeholder="Company" v-model="form.company"/>

            <input-field name="birthday" label="Birthday" :errorMessage="errors.birthday[0]" placeholder="DD/MM/YYYY" v-model="form.birthday"/>

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="py-2 px-4 bg-blue-500 rounded text-white hover:bg-blue-400">Add new contact</button>
            </div>

        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField'

export default {
    name: 'ContactsCreate',
    components: {
        InputField
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                company: '',
                birthday: '',
            },
            errors: {
                name: [],
                email: [],
                company: [],
                birthday: [],
            },
        }
    },
    methods: {
        saveContact() {
            axios.post('/api/contacts', this.form)
            .then(response => {
                console.log(response);
            }).catch(error => {
                this.errors =  {
                    ... {
                        name: [],
                        email: [],
                        company: [],
                        birthday: [],
                    },
                    ... error.response.data.errors
                }
            })
        }
    }

}
</script>
