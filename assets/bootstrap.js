import { startStimulusApp } from '@symfony/stimulus-bridge';

const app = startStimulusApp();

// Register Stimulus controllers from controllers.json and in the controllers/ directory
const context = require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
);

app.load(context);

export { app };
