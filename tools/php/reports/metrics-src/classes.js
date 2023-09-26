var classes = [
    {
        "name": "App\\Controller\\TaskController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
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
            },
            {
                "name": "listTasksDone",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 15,
        "ccn": 9,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\TaskRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Bundle\\SecurityBundle\\Security",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Task",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\TaskRepository"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 2,
        "length": 169,
        "vocabulary": 48,
        "volume": 943.86,
        "difficulty": 8.14,
        "effort": 7682.57,
        "level": 0.12,
        "bugs": 0.31,
        "time": 427,
        "intelligentContent": 115.96,
        "number_operators": 29,
        "number_operands": 140,
        "number_operators_unique": 5,
        "number_operands_unique": 43,
        "cloc": 5,
        "loc": 85,
        "lloc": 80,
        "mi": 54.79,
        "mIwoC": 36.45,
        "commentWeight": 18.35,
        "kanDefect": 0.57,
        "relativeStructuralComplexity": 441,
        "relativeDataComplexity": 0.56,
        "relativeSystemComplexity": 441.56,
        "totalStructuralComplexity": 3087,
        "totalDataComplexity": 3.91,
        "totalSystemComplexity": 3090.91,
        "package": "App\\Controller\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\SecurityController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "loginAction",
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
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Security\\Http\\Authentication\\AuthenticationUtils"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 16,
        "vocabulary": 10,
        "volume": 53.15,
        "difficulty": 1.63,
        "effort": 86.37,
        "level": 0.62,
        "bugs": 0.02,
        "time": 5,
        "intelligentContent": 32.71,
        "number_operators": 3,
        "number_operands": 13,
        "number_operators_unique": 2,
        "number_operands_unique": 8,
        "cloc": 1,
        "loc": 11,
        "lloc": 10,
        "mi": 88.48,
        "mIwoC": 65.97,
        "commentWeight": 22.51,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 9.5,
        "totalStructuralComplexity": 9,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 9.5,
        "package": "App\\Controller\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\UserController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
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
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 11,
        "ccn": 8,
        "ccnMethodMax": 5,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\PasswordHasher\\Hasher\\UserPasswordHasherInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\PasswordHasher\\Hasher\\UserPasswordHasherInterface",
            "App\\Entity\\User",
            "InvalidArgumentException",
            "InvalidArgumentException",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\User",
            "Symfony\\Component\\HttpFoundation\\Request",
            "InvalidArgumentException"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 2,
        "length": 103,
        "vocabulary": 35,
        "volume": 528.32,
        "difficulty": 6.92,
        "effort": 3654.19,
        "level": 0.14,
        "bugs": 0.18,
        "time": 203,
        "intelligentContent": 76.38,
        "number_operators": 20,
        "number_operands": 83,
        "number_operators_unique": 5,
        "number_operands_unique": 30,
        "cloc": 7,
        "loc": 59,
        "lloc": 52,
        "mi": 67.86,
        "mIwoC": 42.43,
        "commentWeight": 25.43,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 289,
        "relativeDataComplexity": 0.36,
        "relativeSystemComplexity": 289.36,
        "totalStructuralComplexity": 1156,
        "totalDataComplexity": 1.44,
        "totalSystemComplexity": 1157.44,
        "package": "App\\Controller\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\DefaultController",
        "interface": false,
        "abstract": false,
        "final": true,
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
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 5,
        "vocabulary": 5,
        "volume": 11.61,
        "difficulty": 0.5,
        "effort": 5.8,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 23.22,
        "number_operators": 1,
        "number_operands": 4,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 1,
        "loc": 9,
        "lloc": 8,
        "mi": 97.4,
        "mIwoC": 72.71,
        "commentWeight": 24.69,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Controller\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Kernel",
        "interface": false,
        "abstract": false,
        "final": true,
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
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Kernel"
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
        "loc": 5,
        "lloc": 5,
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
        "package": "App\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\TaskType",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 18,
        "vocabulary": 12,
        "volume": 64.53,
        "difficulty": 0,
        "effort": 0,
        "level": 1.33,
        "bugs": 0.02,
        "time": 0,
        "intelligentContent": 86.04,
        "number_operators": 0,
        "number_operands": 18,
        "number_operators_unique": 0,
        "number_operands_unique": 12,
        "cloc": 8,
        "loc": 20,
        "lloc": 12,
        "mi": 105.17,
        "mIwoC": 63.65,
        "commentWeight": 41.52,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 4.5,
        "totalStructuralComplexity": 8,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 9,
        "package": "App\\Form\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\UserType",
        "interface": false,
        "abstract": false,
        "final": true,
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
        "wmc": 5,
        "ccn": 5,
        "ccnMethodMax": 5,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\Form\\CallbackTransformer"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 1,
        "length": 51,
        "vocabulary": 32,
        "volume": 255,
        "difficulty": 3.8,
        "effort": 968.06,
        "level": 0.26,
        "bugs": 0.09,
        "time": 54,
        "intelligentContent": 67.17,
        "number_operators": 10,
        "number_operands": 41,
        "number_operators_unique": 5,
        "number_operands_unique": 27,
        "cloc": 12,
        "loc": 31,
        "lloc": 19,
        "mi": 95.65,
        "mIwoC": 54.58,
        "commentWeight": 41.07,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 1.5,
        "relativeSystemComplexity": 10.5,
        "totalStructuralComplexity": 9,
        "totalDataComplexity": 1.5,
        "totalSystemComplexity": 10.5,
        "package": "App\\Form\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Security\\TaskVoter",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "supports",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "voteOnAttribute",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 5,
        "ccnMethodMax": 4,
        "externals": [
            "Symfony\\Component\\Security\\Core\\Authorization\\Voter\\Voter",
            "Symfony\\Component\\Security\\Core\\Authentication\\Token\\TokenInterface"
        ],
        "parents": [
            "Symfony\\Component\\Security\\Core\\Authorization\\Voter\\Voter"
        ],
        "implements": [],
        "lcom": 2,
        "length": 31,
        "vocabulary": 13,
        "volume": 114.71,
        "difficulty": 5.63,
        "effort": 645.26,
        "level": 0.18,
        "bugs": 0.04,
        "time": 36,
        "intelligentContent": 20.39,
        "number_operators": 13,
        "number_operands": 18,
        "number_operators_unique": 5,
        "number_operands_unique": 8,
        "cloc": 13,
        "loc": 37,
        "lloc": 24,
        "mi": 94.53,
        "mIwoC": 54.8,
        "commentWeight": 39.73,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 2.5,
        "relativeSystemComplexity": 6.5,
        "totalStructuralComplexity": 8,
        "totalDataComplexity": 5,
        "totalSystemComplexity": 13,
        "package": "App\\Security\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Task",
        "interface": false,
        "abstract": true,
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
            },
            {
                "name": "getUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUser",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 12,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 6,
        "nbMethodsSetters": 5,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DateTimeImmutable",
            "DateTimeInterface",
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\UserInterface"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 59,
        "vocabulary": 23,
        "volume": 266.89,
        "difficulty": 2.05,
        "effort": 546.49,
        "level": 0.49,
        "bugs": 0.09,
        "time": 30,
        "intelligentContent": 130.34,
        "number_operators": 16,
        "number_operands": 43,
        "number_operators_unique": 2,
        "number_operands_unique": 21,
        "cloc": 19,
        "loc": 81,
        "lloc": 62,
        "mi": 77.87,
        "mIwoC": 43.78,
        "commentWeight": 34.09,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 10.42,
        "relativeSystemComplexity": 10.42,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 125,
        "totalSystemComplexity": 125,
        "package": "App\\Entity\\",
        "pageRank": 0.23,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "App\\Entity\\User",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getUserIdentifier",
                "role": "getter",
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
                "name": "setRoles",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUsername",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUsername",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPassword",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "eraseCredentials",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 4,
        "wmc": 5,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface",
            "LogicException",
            "LogicException",
            "LogicException"
        ],
        "parents": [],
        "implements": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface"
        ],
        "lcom": 2,
        "length": 58,
        "vocabulary": 20,
        "volume": 250.67,
        "difficulty": 3.53,
        "effort": 884.72,
        "level": 0.28,
        "bugs": 0.08,
        "time": 49,
        "intelligentContent": 71.02,
        "number_operators": 18,
        "number_operands": 40,
        "number_operators_unique": 3,
        "number_operands_unique": 17,
        "cloc": 50,
        "loc": 110,
        "lloc": 60,
        "mi": 87.51,
        "mIwoC": 44.28,
        "commentWeight": 43.23,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 9.36,
        "relativeSystemComplexity": 9.36,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 103,
        "totalSystemComplexity": 103,
        "package": "App\\Entity\\",
        "pageRank": 0.16,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "App\\Repository\\UserRepository",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "upgradePassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findOneByRoles",
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
        "wmc": 6,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Symfony\\Component\\Security\\Core\\User\\PasswordUpgraderInterface",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\User",
            "App\\Entity\\User",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface",
            "Symfony\\Component\\Security\\Core\\Exception\\UnsupportedUserException"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [
            "Symfony\\Component\\Security\\Core\\User\\PasswordUpgraderInterface"
        ],
        "lcom": 2,
        "length": 28,
        "vocabulary": 11,
        "volume": 96.86,
        "difficulty": 4.69,
        "effort": 454.05,
        "level": 0.21,
        "bugs": 0.03,
        "time": 25,
        "intelligentContent": 20.66,
        "number_operators": 3,
        "number_operands": 25,
        "number_operators_unique": 3,
        "number_operands_unique": 8,
        "cloc": 12,
        "loc": 44,
        "lloc": 32,
        "mi": 89.17,
        "mIwoC": 52.99,
        "commentWeight": 36.18,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.24,
        "relativeSystemComplexity": 64.24,
        "totalStructuralComplexity": 320,
        "totalDataComplexity": 1.22,
        "totalSystemComplexity": 321.22,
        "package": "App\\Repository\\",
        "pageRank": 0.06,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\TaskRepository",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByUserAndStatus",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByStatus",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 6,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 6,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\Task",
            "App\\Entity\\Task",
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\UserInterface"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 2,
        "length": 42,
        "vocabulary": 12,
        "volume": 150.57,
        "difficulty": 3.8,
        "effort": 572.16,
        "level": 0.26,
        "bugs": 0.05,
        "time": 32,
        "intelligentContent": 39.62,
        "number_operators": 4,
        "number_operands": 38,
        "number_operators_unique": 2,
        "number_operands_unique": 10,
        "cloc": 8,
        "loc": 40,
        "lloc": 32,
        "mi": 83.72,
        "mIwoC": 51.78,
        "commentWeight": 31.94,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.31,
        "relativeSystemComplexity": 144.31,
        "totalStructuralComplexity": 864,
        "totalDataComplexity": 1.85,
        "totalSystemComplexity": 865.85,
        "package": "App\\Repository\\",
        "pageRank": 0.09,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    }
]