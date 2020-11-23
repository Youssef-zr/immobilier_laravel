<template>
  <div class="bar-search">
    <div class="form-group">
      <div class="input-group">
        <input type="text" v-model="query" class="form-control" placeholder="ابحث عن عقار" />
        <span class="input-group-addon">
          <i class="fa fa-search"></i>
        </span>
      </div>

      <ul class="search-result-container" v-if="buildings.length >0">
        <li class="result" v-for="(post,index) in buildings" :key="index">
          <a :href="`/singleBu/${post.id}`">{{post.bu_name}}</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      query: "",
      buildings: []
    };
  },
  watch: {
    query() {
      if (this.query == "") {
        this.buildings = [];
      }
      this.get_building();
    }
  },
  methods: {
    get_building: _.debounce(function() {
      if (this.query != "") {
        axios.get(`/getBuildingAjax/${this.query}`).then(response => {
          this.buildings = response.data.buildings;
        });
      }
    }, 1000)
  }
};
</script>

<style lang="scss">
.bar-search {
  margin-top: 18px;
  position: relative;
  max-height: 300px;
  .form-group {
    input {
      direction: rtl;
      text-align: right;
      border-radius: 0;
      font-size: 16px;
      border-color:#ff4c59;
      &:focus{
          box-shadow: none;
      }
    }
    .input-group-addon {
      background: #ff4c59;
      color: #fff;
      border-color:#ff4c59
    }
  }
  .search-result-container {
    position: absolute;
    z-index: 55;
    background: #fff;
    width: calc(100% - 38px);
    height: auto;
    padding: 8px;
    margin: 1px 0 0;
    list-style-type: none;
    border: 1px solid #ff4c59;
    border-top: none;
    max-height: 230px;
    overflow: hidden;
    overflow-y: auto;
    .result {
      background: #ff4c59;
      text-align: right;
      padding: 5px 8px;
      color: #ffff;
      transition: ease 0.3s;
margin-bottom: 8px;
      a {
        color: inherit;
        font-size: 15px;
        text-transform: capitalize;
        width: 100%;
        height: 100%;
        display: block;
        transition: ease 0.3s;
      }
      
      &:hover {
        background: #ff767f;
        a {
          color: azure;
          padding-right: 5px;
        }
      }
    }
  }
}
</style>
