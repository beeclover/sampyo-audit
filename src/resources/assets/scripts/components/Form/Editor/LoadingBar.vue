<template>
  <svg class="loading-spinner">
    <circle
      :cx="circlePositions[index] && circlePositions[index].x"
      :cy="circlePositions[index] && circlePositions[index].y"
      :r="item.radius"
      :fill="item.color"
      v-for="(item, index) in circles"
      :key="index"
    />
  </svg>
</template>

<script>
const CENTER_X = 50;
const CENTER_Y = 50;
const RADIUS = 20;

function positionOnCircle(radius, angle, center) {
  return {
    x: center.x + radius * Math.cos(toRadians(angle)),
    y: center.y + radius * Math.sin(toRadians(angle)),
  };
}

function toRadians(angle) {
  return (angle * Math.PI) / 180;
}

function calculatePositions(component) {
  let angleIncrement = 360 / component.circles.length;
  let positions = {};
  component.circles.forEach((circle, index) => {
    positions[index] = positionOnCircle(RADIUS, angleIncrement * index, {
      x: CENTER_X,
      y: CENTER_Y,
    });
  });
  return positions;
}

export default {
  data() {
    return {
      circles: [
        { color: '#e6f3fa', radius: 0 },
        { color: '#bfe1f3', radius: 0 },
        { color: '#99cfeb', radius: 0 },
        { color: '#4daadd', radius: 0 },
        { color: '#0095ce', radius: 0 },
        { color: '#0079b9', radius: 0 },
        { color: '#00659b', radius: 0 },
        { color: '#00507c', radius: 0 },
        { color: '#004265', radius: 0 },
      ],
      counter: 0,
      interval: null,
    };
  },
  computed: {
    circlePositions: calculatePositions,
  },
  created() {
    this.interval = setInterval(() => {
      this.counter++;
      this.circles = this.circles.map((item, index) => ({
        ...item,
        radius: (this.counter + index) % 8,
      }));
    }, 70);
  },
  destroyed() {
    clearInterval(this.interval);
  },
};
</script>

<style scoped>
.loading-spinner {
  width: 100px;
  height: 100px;
}
</style>
