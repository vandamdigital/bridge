module.exports = {
    root: true,
    extends: 'airbnb',
    parser: 'babel-eslint',
    globals: {
        wp: true
    },
    env: {
        node: true,
        es6: true,
        amd: true,
        browser: true,
        jquery: true
    },
    parserOptions: {
        ecmaFeatures: {
            globalReturn: true,
            generators: false,
            objectLiteralDuplicateProperties: false
        },
        ecmaVersion: 2017,
        sourceType: 'module'
    },
    plugins: ['import'],
    settings: {
        'import/core-modules': [],
        'import/ignore': ['node_modules', '\\.(coffee|scss|css|less|hbs|svg|json)$']
    },
    rules: {
        'consistent-return': 'off',
        'func-names': 'off',
        'import/prefer-default-export': 'off',
        'indent': 'off',
        'max-len': 'off',
        'no-param-reassign': 'off',
        'no-unused-expressions': 'warn',
        'no-unused-vars': 'warn',
        'comma-dangle': [
            'error',
            {
                arrays: 'always-multiline',
                objects: 'always-multiline',
                imports: 'always-multiline',
                exports: 'always-multiline',
                functions: 'ignore'
            }
        ]
    }
};
