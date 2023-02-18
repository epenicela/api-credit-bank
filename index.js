const express = require('express');
const axios = require('axios');
const app = express();

app.get('/check/:credit_account_id/ammount/:value', async (req, res) => {
    try {
        const creditAccountId = req.params.credit_account_id;
        const value = req.params.value;
        const response = await axios.get(`http://localhost/check/check/${creditAccountId}/amount/${value}/`);
        //var dataHora = response.data.digitalCheck[0].dataHora;
        var checkIdOject = response.data.digitalCheck[0];
        if (checkIdOject.checkId) {
            res.json(checkIdOject);
        } else {
            res.json("Nao autorizado");
        }

    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Erro Interno servidor'});
    }
});

app.listen(3000, () => {
    console.log('Servidor corendo na port 3000');
});
