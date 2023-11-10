var classes = [
    {
        "name": "AppBundle\\Controller\\TaskController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "listAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggleTaskAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteTaskAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\Task",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "AppBundle\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "AppBundle\\Entity\\Task",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "AppBundle\\Entity\\Task",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "implements": [],
        "lcom": 1,
        "length": 82,
        "vocabulary": 19,
        "volume": 348.33,
        "difficulty": 6.38,
        "effort": 2220.6,
        "level": 0.16,
        "bugs": 0.12,
        "time": 123,
        "intelligentContent": 54.64,
        "number_operators": 14,
        "number_operands": 68,
        "number_operators_unique": 3,
        "number_operands_unique": 16,
        "cloc": 15,
        "loc": 63,
        "lloc": 48,
        "mi": 79.42,
        "mIwoC": 45.12,
        "commentWeight": 34.3,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 289,
        "relativeDataComplexity": 0.44,
        "relativeSystemComplexity": 289.44,
        "totalStructuralComplexity": 1445,
        "totalDataComplexity": 2.22,
        "totalSystemComplexity": 1447.22,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\SecurityController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "loginAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "loginCheck",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "logoutCheck",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "implements": [],
        "lcom": 3,
        "length": 18,
        "vocabulary": 10,
        "volume": 59.79,
        "difficulty": 1.75,
        "effort": 104.64,
        "level": 0.57,
        "bugs": 0.02,
        "time": 6,
        "intelligentContent": 34.17,
        "number_operators": 4,
        "number_operands": 14,
        "number_operators_unique": 2,
        "number_operands_unique": 8,
        "cloc": 11,
        "loc": 28,
        "lloc": 17,
        "mi": 101.86,
        "mIwoC": 60.58,
        "commentWeight": 41.27,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.27,
        "relativeSystemComplexity": 16.27,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 0.8,
        "totalSystemComplexity": 48.8,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\UserController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "listAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\User",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "AppBundle\\Entity\\User",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "implements": [],
        "lcom": 1,
        "length": 74,
        "vocabulary": 19,
        "volume": 314.35,
        "difficulty": 5.72,
        "effort": 1797.67,
        "level": 0.17,
        "bugs": 0.1,
        "time": 100,
        "intelligentContent": 54.97,
        "number_operators": 13,
        "number_operands": 61,
        "number_operators_unique": 3,
        "number_operands_unique": 16,
        "cloc": 9,
        "loc": 46,
        "lloc": 37,
        "mi": 79.54,
        "mIwoC": 47.9,
        "commentWeight": 31.64,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 289,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 289.33,
        "totalStructuralComplexity": 867,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 868,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\DefaultController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller"
        ],
        "implements": [],
        "lcom": 1,
        "length": 3,
        "vocabulary": 3,
        "volume": 4.75,
        "difficulty": 0.5,
        "effort": 2.38,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 9.51,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 2,
        "cloc": 3,
        "loc": 11,
        "lloc": 8,
        "mi": 111.61,
        "mIwoC": 75.43,
        "commentWeight": 36.18,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "AppBundle\\Controller\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\AppBundle",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Bundle\\Bundle"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Bundle\\Bundle"
        ],
        "implements": [],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 0,
        "loc": 4,
        "lloc": 4,
        "mi": 171,
        "mIwoC": 171,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "AppBundle\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\TaskType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 1,
        "length": 5,
        "vocabulary": 4,
        "volume": 10,
        "difficulty": 0,
        "effort": 0,
        "level": 1.6,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 16,
        "number_operators": 0,
        "number_operands": 5,
        "number_operators_unique": 0,
        "number_operands_unique": 4,
        "cloc": 0,
        "loc": 8,
        "lloc": 8,
        "mi": 73.16,
        "mIwoC": 73.16,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "AppBundle\\Form\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\UserType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 1,
        "length": 20,
        "vocabulary": 16,
        "volume": 80,
        "difficulty": 0,
        "effort": 0,
        "level": 1.6,
        "bugs": 0.03,
        "time": 0,
        "intelligentContent": 128,
        "number_operators": 0,
        "number_operands": 20,
        "number_operators_unique": 0,
        "number_operands_unique": 16,
        "cloc": 0,
        "loc": 8,
        "lloc": 8,
        "mi": 66.84,
        "mIwoC": 66.84,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "AppBundle\\Form\\",
        "pageRank": 0.09,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Task",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitle",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContent",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isDone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 4,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Datetime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 30,
        "vocabulary": 7,
        "volume": 84.22,
        "difficulty": 3.8,
        "effort": 320.04,
        "level": 0.26,
        "bugs": 0.03,
        "time": 18,
        "intelligentContent": 22.16,
        "number_operators": 11,
        "number_operands": 19,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 23,
        "loc": 73,
        "lloc": 50,
        "mi": 87.53,
        "mIwoC": 49.32,
        "commentWeight": 38.2,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 5.4,
        "relativeSystemComplexity": 5.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 54,
        "totalSystemComplexity": 54,
        "package": "AppBundle\\Entity\\",
        "pageRank": 0.21,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\User",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUsername",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUsername",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSalt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPassword",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRoles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "eraseCredentials",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 3,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface"
        ],
        "parents": [],
        "implements": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface"
        ],
        "lcom": 3,
        "length": 23,
        "vocabulary": 7,
        "volume": 64.57,
        "difficulty": 2.8,
        "effort": 180.79,
        "level": 0.36,
        "bugs": 0.02,
        "time": 10,
        "intelligentContent": 23.06,
        "number_operators": 9,
        "number_operands": 14,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 22,
        "loc": 69,
        "lloc": 47,
        "mi": 89.09,
        "mIwoC": 50.72,
        "commentWeight": 38.37,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 6.3,
        "relativeSystemComplexity": 6.3,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 63,
        "totalSystemComplexity": 63,
        "package": "AppBundle\\Entity\\",
        "pageRank": 0.18,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    }
]