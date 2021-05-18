export default {
    data() {
		return {
            confirmDeletion: {
                show: false,
                callback: ''
            }

		}
	},

    methods: {
        $confirmDeletionShow(callback) {
            this.$root.confirmDeletion.show = true;
            this.$root.confirmDeletion.callback = callback;

        },

        $confirmDeletionClose(callback) {
            this.$root.confirmDeletion.show = false;
        },

        $confirmDelete() {
            this.$root.confirmDeletion.callback();
        }
    },

};
