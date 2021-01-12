<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.post('http://booty.test/api/register', {
                name: 'Finn',
                email: 'cmdklcadlackmskl@gmail.com',
                password: 'password',
                password_confirmation: 'password'

            })
                .then((response) => {
                    console.log(response);
                }, (error) => {
                    console.log(error);
                });
        }
    }
</script>
