export default {
    data() {
		return {
            response: {
                show: false,
                type: '',
                errors: [],
                successMessage: '',
                status: ''
            }

		}
	},

    methods: {
        $responseShow(response) {
            this.$root.response.show = true;

            if(!!response.data.errors) {
                this.$root.response.type = 'error';
                this.$root.response.errors = response.data.errors;
                this.$root.response.status = response.status;
            } else {
                this.$root.response.type = 'success';
                this.$root.response.successMessage = response.statusText
            }
        },

        $responseClose() {
            this.$root.response.show = false;
        }
    },

};
