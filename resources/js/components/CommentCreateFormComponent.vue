<template>
    <div class="card text-center mt-3">
        <div class="card-body p-0">
            <table class='table m-0'>
                <thead>
                    <tr>
                        <th>投稿内容</th>
                        <th>投稿</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='form-group'>
                            <textarea class='form-control mh-100' v-model='body'></textarea>
                        </td>
                        <td class='form-group align-middle'>
                            <input type="submit" value="投稿" class='form-control btn btn-primary mh-100' @click='post'>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'url',
            'user_id',
        ],
        data() {
            return {
                body: "",
            };
        },
        methods: {
            post() {
                let comment = {
                    'user_id': this.user_id,
                    'body': this.body
                };
                console.log(comment);
                axios.post(this.url, comment)
                .then(response => console.log(response.data))
                .catch(response => console.log(response));
            }
        },
        created() {
            // 定期的に最新の投稿を取得する
        }
    }
</script>
