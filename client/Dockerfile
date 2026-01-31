FROM node:20-alpine

# Set working directory
WORKDIR /app

# Install dependencies
COPY package*.json ./
RUN npm install

# Copy application code
COPY . .

# Build argument for environment
ARG NODE_ENV=development
ENV NODE_ENV=${NODE_ENV}

# Expose port
EXPOSE 3000

# Start the application in dev mode
CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]
