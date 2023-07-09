<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createNewsCategory'}" class="btn btn-success">Create News Category</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">News Category List</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="category, index in news_categories">
                        <td>{{ category.name }}</td>
                        <td>{{ category.parent != null ? category.parent.name : ''}}</td>
                        <td>{!! category.status == 1 ? '<label class="label label-success">Hoạt động</label>' : '<label class="label label-danger">Tạm khóa</label>' }</td>
                        <td>{{ category.created_at }}</td>
                        <td>
                            <router-link :to="{name: 'editNewsCategory', params: {id: category.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(category.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                news_categories: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/news-categories')
                .then(function (resp) {
                    app.news_categories = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load news-categories");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/news-categories/' + id)
                        .then(function (resp) {
                            app.news_categories.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>