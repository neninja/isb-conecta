<template>
    <div>
        <table class="centered striped">
            <thead>
                <tr>
                    <th v-for="(column, i) in columnsDesc" :key="i">
                        {{column}}
                    </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="buttons.includes('add')">
                    <td :colspan="columnsData.length">
                    </td>
                    <td>
                        <Button color="green" @click="$emit('add')">
                            <i class="material-icons">add</i>
                        </Button>
                    </td>
                </tr>
                <tr v-for="(row, i) in data" :key="i">
                    <td v-for="(column, j) in columnsData" :key="j">
                        {{row[column]}}
                    </td>
                    <td>
                        <Button v-if="buttons.includes('edit')"
                                @click="$emit('edit', row)"
                                color="blue">
                            <i class="material-icons">edit</i>
                        </Button>
                        <Button v-if="buttons.includes('delete')"
                                @click="$emit('del', row)"
                                color="red">
                            <i class="material-icons">delete</i>
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Button from '@components/Button.vue'

export default {
    components: {
        Button
    },
    props: [
        'data', 'columnsData', 'columnsDesc', 'buttons'
    ],
    data(){
        return {

        }
    }
}
</script>
