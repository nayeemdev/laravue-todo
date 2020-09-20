<template>
    <div>
        <form @submit.prevent="createTodo">
            <div class="input-group">
                <input v-model="form.title" type="text" class="form-control" />
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        ADD TODO
                    </button>
                </div>
            </div>
        </form>
        <div class="mt-5">
            <div
                class="w-100 bg-white p-2 border"
                v-for="todo in todos"
                :key="todo.id"
            >
                {{ todo.title }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: "",
            form: new Form({
                title: ""
            })
        };
    },

    methods: {
        getTodo() {
            axios
                .get("/api/todo")
                .then(res => {
                    this.todos = res.data.results;
                })
                .catch(err => {
                    console.log(err);
                });
        },

        createTodo() {
            let data = new FormData();
            data.append("title", this.form.title);
            axios.post("/api/todo", data).then(res => {
                this.form.title = "";
                this.getTodo();
                this.showSuccessMsg({
                    message: res.data.message,
                    timeout: 3000
                });
            });
        }
    },

    mounted() {
        this.getTodo();
    },

    notifications: {
        showSuccessMsg: {
            type: "success",
            title: "Success",
            message: "That's the success!",
            position: "topRight"
        },
        showInfoMsg: {
            type: "info",
            title: "Hey you",
            message: "Here is some info for you",
            position: "topRight"
        },
        showWarnMsg: {
            type: "warn",
            title: "Wow, man",
            message: "That's the kind of warning",
            position: "topRight"
        },
        showErrorMsg: {
            type: "error",
            title: "Wow-wow",
            message: "That's the error",
            position: "topRight"
        }
    }
};
</script>
