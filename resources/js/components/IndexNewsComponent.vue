<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="country">Select Country</label>
                                    <select name="country" id="country" class="form-control"
                                            @change="countryChange($event)">
                                        <option value="us">US</option>
                                        <option value="gb">UK</option>
                                        <option value="de">Germany</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="card mb-5" v-for="n in news">
                        <div class="card-header">
                            <a v-bind:href="n.url" target="_blanks">{{ n.title }}</a>
                            <button class="btn btn-primary btn-sm float-right" @click="saveNews($event, n)">Save
                            </button>
                        </div>
                        <div class="card-body">
                            {{ n.description }}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                news: []
            }
        },

        created() {
            let url = 'http://newsapi.org/v2/top-headlines?country=us&apiKey=b61e77b26e9a4de7aebbbb442f86abb0';
            this.fetchNews(url);
        },

        methods: {
            fetchNews(url) {
                $.get(url, (data) => {
                    this.news = (data.articles);
                });
            },

            countryChange(event) {
                let countrySelection = event.target.value;
                let url = `http://newsapi.org/v2/top-headlines?country=${countrySelection}&apiKey=b61e77b26e9a4de7aebbbb442f86abb0`;
                this.fetchNews(url);
            },

            saveNews(event, n) {
                let data = {
                    title: n.title,
                    source: n.source.name,
                    description: n.description,
                    url: n.url,
                    imageUrl: n.urlToImage,
                    newsPublishedAt: n.publishedAt,
                    newsContent: n.content,
                    _token: $('meta[name="csrf-token"]').attr('content')
                }; //
                event.target.disabled = true;
                $.post({
                    url: '/ajax/save-news',
                    data: data,
                    success: function (res) {
                        alert('Added to your saved news!');
                        event.target.style.display = 'none';
                    }
                });
            }
        }
    }
</script>
