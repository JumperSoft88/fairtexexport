jQuery(function ($) {
    $("#exportButtonDraftPdf").click(function () {
        // parse the HTML table element having an id=exportTable
        var dataSource = shield.DataSource.create({
            data: "#exportTable",
            schema: {
                type: "table",
                fields: {
                    Name: { type: String },
                    Age: { type: Number },
                    Email: { type: String }
                }
            }
        });

        // when parsing is done, export the data to PDF
        dataSource.read().then(function (data) {
            var pdf = new shield.exp.PDFDocument({
                author: "PrepBootstrap",
                created: new Date()
            });

            pdf.addPage("a4", "portrait");

            pdf.table(
                50,
                50,
                data,
                [
                    { field: "Name", title: "Person Name", width: 200 },
                    { field: "Age", title: "Age", width: 50 },
                    { field: "Email", title: "Email Address", width: 200 }
                ],
                {
                    margins: {
                        top: 50,
                        left: 50
                    }
                }
            );

            pdf.saveAs({
                fileName: "PrepBootstrapPDF"
            });
        });
    });
});

jQuery(function ($) {
    $("#exportButtonDraftExcel").click(function () {
        // parse the HTML table element having an id=exportTable
        var dataSource = shield.DataSource.create({
            data: "#exportTable",
            schema: {
                type: "table",
                fields: {
                    Name: { type: String },
                    Age: { type: Number },
                    Email: { type: String }
                }
            }
        });

        // when parsing is done, export the data to Excel
        dataSource.read().then(function (data) {
            new shield.exp.OOXMLWorkbook({
                author: "PrepBootstrap",
                worksheets: [
                    {
                        name: "PrepBootstrap Table",
                        rows: [
                            {
                                cells: [
                                    {
                                        style: {
                                            bold: true
                                        },
                                        type: String,
                                        value: "Name"
                                    },
                                    {
                                        style: {
                                            bold: true
                                        },
                                        type: String,
                                        value: "Age"
                                    },
                                    {
                                        style: {
                                            bold: true
                                        },
                                        type: String,
                                        value: "Email"
                                    }
                                ]
                            }
                        ].concat($.map(data, function(item) {
                            return {
                                cells: [
                                    { type: String, value: item.Name },
                                    { type: Number, value: item.Age },
                                    { type: String, value: item.Email }
                                ]
                            };
                        }))
                    }
                ]
            }).saveAs({
                fileName: "PrepBootstrapExcel"
            });
        });
    });
});