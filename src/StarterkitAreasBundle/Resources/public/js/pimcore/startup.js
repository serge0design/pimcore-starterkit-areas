pimcore.registerNS("pimcore.plugin.StarterkitAreasBundle");

pimcore.plugin.StarterkitAreasBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.StarterkitAreasBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("StarterkitAreasBundle ready!");
    }
});

var StarterkitAreasBundlePlugin = new pimcore.plugin.StarterkitAreasBundle();
