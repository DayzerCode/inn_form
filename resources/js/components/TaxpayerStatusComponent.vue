<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Проверка на профессиональный доход</div>
                        <div class="card-body">
                            <form v-on:submit="request()">
                                <div class="form-group row">
                                    <label for="inn" class="col-md-4 col-form-label">ИНН</label>
                                    <div class="col-md-6">
                                        <input v-model="data.inn" id="inn" type="text" class="form-control" name="inn"
                                               required
                                               autocomplete="email" autofocus>
                                    </div>
                                    <small class="form-text text-muted col-md-12">* ИНН должен состоять из 12-ти
                                        цифр</small>
                                </div>
                                <div class="form-group">
                                    <div v-if="error !== ''" class="alert alert-danger" role="alert">
                                        {{error}}
                                    </div>
                                    <div v-if="resultMessage !== ''" class="alert alert-primary" role="alert">
                                        {{resultMessage}}
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Проверить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'TaxpayerStatusComponent',
        data() {
            return {
                data: {
                    inn: ''
                },
                error: '',
                resultMessage: ''
            }
        },
        methods: {
            request() {
                event.preventDefault();
                this.resultMessage = '';
                this.error = '';
                axios.post(this.taxpayerStatusRoute, this.data).then(response => {
                    this.resultMessage = response.data.message;
                }).catch(error => {
                    for (let key in error.response.data.errors) {
                        this.error = error.response.data.errors[key][0];
                    }
                });
            },
        },
        props: ['taxpayerStatusRoute'],
    }
</script>
