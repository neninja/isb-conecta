<template>
    <div>
        <div class="card cardd" :class="accordionClasses">
            <div class="card-content">
                <span
                    class="card-title message-header"
                    @click="toggleAccordion">
                    {{relatorio}}
                    <i class="material-icons right">{{ isOpen ? "expand_less" : "expand_more" }}</i></span>
                </span>
                <div class="message-body">
                    <div class="fields">
                        <div class="field icon">
                            <i class="material-icons">event</i></span>
                        </div>
                        <p class="field content date">{{new Date(data + " 00:00:00").toLocaleDateString('pt')}}</p>
                    </div>
                    <div class="fields">
                        <div class="field icon">
                            <i class="material-icons">account_circle</i></span>
                        </div>
                        <p class="field content">{{usuario}}</p>
                    </div>
                    <div class="fields">
                        <div class="title">
                            Usuário atendido
                        </div>
                    </div>
                    <div class="fields">
                        <p class="field content">{{pessoaAtendida}}</p>
                    </div>
                    <div class="limite">
                        <div class="fields">
                            <div class="title">
                                Relatório
                            </div>
                        </div>
                        <div class="fields">
                            <p class="field content">{{relato}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.cardd {
    border-radius: 5px;
}
.message-header {
    cursor: pointer;
    text-transform: uppercase;
    background: #005D73;
    color: #fff;
    border-radius: 5px;
    padding: .5rem;
    font-size: 1rem;
    font-weight: bold;
    margin: 0px !important;
}

.card-content {
    padding: 1rem;
}

.field {
    background: #F7F8FC;
    border-radius: 5px;
    padding: .5rem;
}

.field.icon {
    margin-right: .5rem;
    color: #005D73;
}

.field.date {
    font-weight: bold;
    color: #005D73;
}

.field.content {
    width: 100%;
}

.fields {
    display: flex;
    padding-bottom: 0.5rem;
}

.message-body   {
    padding: 0;
    margin-top: .5rem;
    overflow-y: auto;
}

.limite {
    max-height: 50em;
    transition: 0.3s ease all;
}

.is-closed .limite {
    max-height: 0;
    display: none;
    margin-top: 0px;
}

.fields .title {
    color: #005D73;
    font-weight: bold;
    text-transform: uppercase;
}
</style>

<script>
export default {
    props: [
        'relatorio', 'data', 'usuario', 'pessoaAtendida', 'relato'
    ],
    data() {
        return {
            isOpen: false
        }
    },
    methods: {
        toggleAccordion: function() {
            this.isOpen = !this.isOpen;
        }

    },
    computed: {
        accordionClasses: function() {
            return {
                'is-closed': !this.isOpen
            };
        }
    }
}
</script>
