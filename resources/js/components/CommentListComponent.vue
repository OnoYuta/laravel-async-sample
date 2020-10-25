<template>
    <div class="card-body p-0">
        <table class='table'>
            <thead>
                <tr>
                    <th>投稿者</th>
                    <th>投稿内容</th>
                    <th>投稿日時</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="message">
                    <td colspan="3" class='text-primary text-center'>
                        {{ message }}
                    </td>
                </tr>
                <tr v-for="comment in comments" v-bind:key="comment.id">
                    <td>{{ comment.user.name }}</td>
                    <td>{{ comment.body | formatBody }}</td>
                    <td>
                        {{ comment.created_date }}<br>
                        {{ comment.created_time }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: [
            'url',
            'data',
            'msg',
        ],
        data() {
            return {
                comments: {},
            };
        },
        filters: {
            formatBody: function(val) {
                let limit = 15;
                if(val.length <= limit) {
                    return val;
                }
                return val.substr(0, limit - 1) + '...';
            },
        },
        methods: {
            updateList: function() {
                axios.get(this.url)
                .then(function(response){
                    this.comments = response.data.comments.data;
                    this.message = response.data.msg;
                }.bind(this))
                .catch(response => console.log(response));
            }
        },
        created() {
            this.comments = this.data.data;
            this.message = this.data.msg;

            // 定期的に最新の投稿を取得する
            setInterval(function(){
                this.updateList();
            }.bind(this),5000);
        }
    }
</script>
